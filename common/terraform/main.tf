provider "digitalocean" {
  token = var.do_token
}

locals {
  domain_records = [
    {
      name  = "@"
      type  = "A"
      value = module.droplet.ipv4
    },
    {
      name  = "@"
      type  = "AAAA"
      value = module.droplet.ipv6
    },
    {
      name  = "*"
      type  = "A"
      value = module.droplet.ipv4
      }, {
      name  = "*"
      type  = "AAAA"
      value = module.droplet.ipv6
    }
  ]
}

module "domain_mvdhdev" {
  source  = "./modules/do_domain"
  domain  = "maartenvanderheijden.dev"
  records = local.domain_records
}

module "domain_mdev" {
  source  = "./modules/do_domain"
  domain  = "maarten.dev"
  records = local.domain_records
}

module "droplet" {
  source   = "./modules/do_droplet"
  name     = "entrypoint"
  ssh_keys = [module.do_ssh_key.id, module.personal_ssh_key.id]
}

module "project" {
  source      = "./modules/do_project"
  name        = "Production"
  description = "Production files"
  purpose     = "Website or blog"
  environment = "Production"
  resources   = [module.droplet.droplet_urn, module.domain_mdev.domain_urn, module.domain_mvdhdev.domain_urn]
}

module "personal_ssh_key" {
  source     = "./modules/do_key"
  name       = "personal_key"
  public_key = var.personal_public_key
}

module "do_ssh_key" {
  source     = "./modules/do_key"
  name       = "do_key"
  public_key = var.portfolio_public_key
}
