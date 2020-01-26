resource "digitalocean_volume" "portfolio_volume" {
  name = "portfolio volume"
  region = var.region
  size = 1
}

resource "digitalocean_volume_attachment" "portfolio_volume_attachment" {
  droplet_id = digitalocean_droplet.portfolio_droplet.id
  volume_id = digitalocean_volume.portfolio_volume.id
}
