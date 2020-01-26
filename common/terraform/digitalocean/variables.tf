variable "do_token" {
  description = "Token to connect to DigitalOcean"
}
variable "personal_public_key" {
  description = "Public key for personal reasons"
}
variable "portfolio_public_key" {
  description = "Public key for the portfolio"
}
variable "portfolio_private_key" {
  description = "Private key used to connect ansible with the droplets"
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
