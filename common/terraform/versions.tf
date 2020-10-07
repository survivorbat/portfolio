terraform {
  required_providers {
    digitalocean = {
      source = "terraform-providers/digitalocean"
    }

    acme = {
      source = "terraform-providers/acme"
    }
  }
  required_version = ">= 0.13"
}
