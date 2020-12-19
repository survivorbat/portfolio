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
    },
    {
      name = "margo"
      type = "A"
      value = module.droplet_mc.ipv4
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
  source      = "./modules/do_droplet"
  name        = "main"
  size        = "s-4vcpu-8gb"
  resize_disk = false
  image       = "ubuntu-20-04-x64"
  ssh_keys    = [digitalocean_ssh_key.personal_key.id, digitalocean_ssh_key.public_key.id]
}

module "droplet_mc" {
  source      = "./modules/do_droplet"
  name        = "mc"
  size        = "s-1vcpu-2gb"
  resize_disk = false
  image       = "ubuntu-20-04-x64"
  ssh_keys    = [digitalocean_ssh_key.personal_key.id, digitalocean_ssh_key.public_key.id]
}

module "project" {
  source      = "./modules/do_project"
  name        = "Production"
  description = "Production files"
  purpose     = "Website or blog"
  environment = "Production"
  resources = [
    module.droplet.droplet_urn,
    module.domain_mdev.domain_urn,
    module.domain_mvdhdev.domain_urn,
    # This object contains all our state
    "do:space:portfolio-terraform-state"
  ]
}

resource "digitalocean_ssh_key" "personal_key" {
  name       = "do_key"
  public_key = var.personal_public_key
}

resource "digitalocean_ssh_key" "public_key" {
  name       = "portfolio_key"
  public_key = var.portfolio_public_key
}

provider "acme" {
  server_url = "https://acme-v02.api.letsencrypt.org/directory"
}

resource "tls_private_key" "private_key" {
  algorithm = "RSA"
  rsa_bits  = "2048"
}

resource "acme_registration" "acme_registration" {
  account_key_pem = tls_private_key.private_key.private_key_pem
  email_address   = "" # TODO
}

resource "acme_certificate" "acme_cert" {
  account_key_pem = acme_registration.acme_registration.account_key_pem
  dns_challenge {
    provider = "digitalocean"
    config = {
      DO_AUTH_TOKEN = var.do_token
    }
  }

  subject_alternative_names = [
    "*.maarten.dev",
    "maartenvanderheijden.dev",
    "*.maartenvanderheijden.dev",
  ]
  common_name = "maarten.dev"
}

# Dump the key and certificate in the pipeline
resource "local_file" "acme_fullchain" {
  filename          = "${path.cwd}/fullchain.pem"
  sensitive_content = acme_certificate.acme_cert.certificate_pem
}

resource "local_file" "acme_private_key" {
  filename          = "${path.cwd}/key.pem"
  sensitive_content = acme_certificate.acme_cert.private_key_pem
}
