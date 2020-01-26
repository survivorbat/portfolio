resource "digitalocean_loadbalancer" "portfolio_loadbalancer" {
  name = "Portfolio LoadBalancer"
  region = var.region

  forwarding_rule {
    entry_port = 80
    entry_protocol = "http"
    target_port = 80
    target_protocol = "http"
  }

  forwarding_rule {
    entry_port = 443
    entry_protocol = "https"
    target_port = 443
    target_protocol = "https"
    certificate_id = digitalocean_certificate.portfolio_loadbalancer_certificate.id
  }

  redirect_http_to_https = true

  healthcheck {
    port = 80
    protocol = "http"
    path = "/"
  }

  droplet_ids = [
    digitalocean_droplet.portfolio_droplet.id
  ]
}

resource "digitalocean_certificate" "portfolio_loadbalancer_certificate" {
  name = "https certificate"
  domains = [
    digitalocean_domain.maarten_dev.urn,
    digitalocean_domain.maartenvanderheijden_dev.urn
  ]
}
