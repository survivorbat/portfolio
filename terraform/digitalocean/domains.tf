resource "digitalocean_domain" "maarten_dev" {
  name = "maarten.dev"
}

resource "digitalocean_record" "maarten_dev" {
  domain = digitalocean_domain.maarten_dev.name
  name = "@"
  type = "A"
  value = kubernetes_service.ingress-nginx.spec[0].load_balancer_ip
  ttl = 30
}

resource "digitalocean_domain" "maartenvanderheijden_dev" {
  name = "maartenvanderheijden.dev"
}

resource "digitalocean_record" "maartenvanderheijden_dev" {
  domain = digitalocean_domain.maartenvanderheijden_dev.name
  name = "@"
  type = "A"
  value = kubernetes_service.ingress-nginx.spec[0].load_balancer_ip
  ttl = 30
}
