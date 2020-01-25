resource "digitalocean_droplet" "portfolio_droplet" {
  image = var.default_image
  name = "portfolio"
  region = var.region
  size = "s-1vcpu-2gb"
  ssh_keys = [
    digitalocean_ssh_key.personal_key.id
  ]
  ipv6 = true
}
