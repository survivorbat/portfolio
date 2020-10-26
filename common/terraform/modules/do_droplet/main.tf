resource "digitalocean_droplet" "droplet" {
  image = var.default_image
  name = var.name
  region = var.region
  size = var.size
  ssh_keys = var.ssh_keys

  ipv6 = true
  monitoring = true
  backups = var.backups
  private_networking = var.private_networking
}
