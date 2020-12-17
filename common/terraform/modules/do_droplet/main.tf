resource "digitalocean_droplet" "droplet" {
  image = var.image
  name = var.name
  region = var.region
  size = var.size
  ssh_keys = var.ssh_keys

  ipv6 = true
  resize_disk = var.resize_disk
  monitoring = true
  backups = var.backups
}
