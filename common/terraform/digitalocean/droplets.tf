resource "digitalocean_droplet" "portfolio_droplet" {
  image = var.default_image
  name = "portfolio"
  region = var.region
  size = var.default_size
  ssh_keys = [
    digitalocean_ssh_key.personal_key.id,
    digitalocean_ssh_key.portfolio_key.id
  ]

  ipv6 = true

  provisioner "remote-exec" {
    inline = ["echo 'Hello World'"]

    connection {
      host = self.ipv4_address
      type = "ssh"
      user = "root"
      private_key = file(var.portfolio_private_key)
      timeout = "2m"
      agent = true
    }
  }

  provisioner "local-exec" {
    working_dir = "ansible"

    environment = {
      letsencrypt_email: var.email
      do_token = var.do_token
      personal_public_key = file(var.personal_public_key)
      portfolio_public_key = file(var.portfolio_public_key)
      domains = "${digitalocean_domain.maarten_dev.name},${digitalocean_domain.maartenvanderheijden_dev.name}"
    }
    command = "ANSIBLE_HOST_KEY_CHECKING=False ansible-playbook -u root -i '${self.ipv4_address},' site.yaml"
  }
}
