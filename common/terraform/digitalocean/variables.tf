variable "do_token" {
  description = "Token to connect to DigitalOcean"
}

variable "personal_public_key" {
  description = "Path to personal public key"
}

variable "portfolio_public_key" {
  description = "Path to portfolio public key"
}

variable "portfolio_private_key" {
  description = "Path to portfolio private key"
}

variable "region" {
  default = "ams3"
  description = "Region to put infrastructure in"
}

variable "default_image" {
  default = "ubuntu-18-04-x64"
  description = "Default image of a droplet"
}

variable "default_size" {
  default = "s-1vcpu-1gb"
  description = "Default size of a droplet"
}

variable "email" {
  default = "djbatcat@gmail.com"
  description = "Email"
}
