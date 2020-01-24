resource "digitalocean_domain" "maarten_dev" {
  name = "maarten.dev"
  ip_address = "165.227.160.174"
}

resource "digitalocean_record" "maarten_dev_all" {
  domain = digitalocean_domain.maarten_dev.name
  name = "*"
  type = "A"
  value = "165.227.160.174"
}

resource "digitalocean_domain" "maartenvanderheijden_dev" {
  name = "maartenvanderheijden.dev"
  ip_address = "165.227.160.174"
}

resource "digitalocean_record" "maartenvanderheijden_dev_all" {
  domain = digitalocean_domain.maartenvanderheijden_dev.name
  name = "*"
  type = "A"
  value = "165.227.160.174"
}
