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
