resource "digitalocean_droplet" "portfolio_droplet" {
  image = var.default_image
  name = "portfolio"
  region = var.region
  size = "s-1vcpu-2gb"
  ssh_keys = [
    digitalocean_ssh_key.personal_key.id,
    digitalocean_ssh_key.portfolio_key.id
  ]

  ipv6 = true

  provisioner "local-exec" {
    working_dir = "../../ansible"

    environment = {
      do_token = var.do_token
      personal_public_key = var.personal_public_key
      portfolio_public_key = var.portfolio_public_key
      domains = "${digitalocean_domain.maarten_dev.name},${digitalocean_domain.maartenvanderheijden_dev.name},*.${digitalocean_domain.maartenvanderheijden_dev.name},*.${digitalocean_domain.maarten_dev.name}"
    }
    command = "ANSIBLE_HOST_KEY_CHECKING=False ansible-playbook -u root -i '${digitalocean_droplet.portfolio_droplet.ipv4_address},' site.yaml"
  }

  provisioner "remote-exec" {
    script = "echo 'Hello World, ready for Ansible'"
  }
}
