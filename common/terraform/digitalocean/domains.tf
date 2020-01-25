resource "digitalocean_domain" "maarten_dev" {
  name = "maarten.dev"
}

resource "digitalocean_record" "maarten_dev" {
  domain = digitalocean_domain.maarten_dev.name
  name = "@"
  type = "A"
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
  ttl = 30
}

resource "digitalocean_record" "all_maarten_dev" {
  domain = digitalocean_domain.maarten_dev.name
  name = "*"
  type = "A"
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
  ttl = 30
}

resource "digitalocean_domain" "maartenvanderheijden_dev" {
  name = "maartenvanderheijden.dev"
}

resource "digitalocean_record" "maartenvanderheijden_dev" {
  domain = digitalocean_domain.maartenvanderheijden_dev.name
  name = "@"
  type = "A"
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
  ttl = 30
}

resource "digitalocean_record" "all_maartenvanderheijden_dev" {
  domain = digitalocean_domain.maartenvanderheijden_dev.name
  name = "*"
  type = "A"
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
  ttl = 30
}
