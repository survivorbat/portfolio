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

variable "name" {
  description = "Name of the droplet"
}

variable "ssh_keys" {
  type = list(string)
  default = []
  description = "List of ssh keys"
}