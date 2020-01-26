resource "digitalocean_project" "portfolio" {
  name    = "Projects Production"
  description = "The project that will be used to contain my portfolio and other projects"
  purpose = "Projects"
  environment = "production"
  resources = [
    digitalocean_domain.maarten_dev.urn,
    digitalocean_domain.maartenvanderheijden_dev.urn,
    digitalocean_droplet.portfolio_droplet.urn,
    digitalocean_loadbalancer.portfolio_loadbalancer.urn
  ]
}

