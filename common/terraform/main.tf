provider "digitalocean" {
  token = var.do_token
}

module "domain_mvdhdev" {
  source  = "./modules/do_domain"
  domain  = "maartenvanderheijden.dev"
  records = []
}

module "domain_mdev" {
  source  = "./modules/do_domain"
  domain  = "maarten.dev"
  records = []
}

module "project" {
  source      = "./modules/do_project"
  name        = "Production"
  description = "Production files"
  purpose     = "Website or blog"
  environment = "Production"
  resources = [
    module.domain_mdev.domain_urn,
    module.domain_mvdhdev.domain_urn
  ]
}

resource "digitalocean_ssh_key" "personal_key" {
  name       = "do_key"
  public_key = var.personal_public_key
}

provider "acme" {
  server_url = "https://acme-v02.api.letsencrypt.org/directory"
}
