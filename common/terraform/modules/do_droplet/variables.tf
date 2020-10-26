variable "region" {
  default = "ams3"
  description = "Region to put infrastructure in"
}

variable "default_image" {
  default = "ubuntu-18-04-x64"
  description = "Default image of a droplet"
}

variable "size" {
  default = "s-1vcpu-1gb"
  description = "Default size of a droplet"
}

variable "name" {
  description = "Name of the droplet"
}

variable "ssh_keys" {
  type = list(string)
  default = []
  description = "List of ssh keys"
}

variable "backups" {
  type = bool
  default = false
  description = "Whether to enable backups"
}

variable "private_networking" {
  type = bool
  default = false
  description = "Whether to enable private networking"
}
