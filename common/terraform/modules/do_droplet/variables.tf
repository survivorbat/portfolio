variable "region" {
  default = "ams3"
  type = string
  description = "Region to put infrastructure in"
}

variable "image" {
  default = "ubuntu-18-04-x64"
  type = string
  description = "Default image of a droplet"
}

variable "resize_disk" {
  type = bool
  default = false
}

variable "size" {
  default = "s-1vcpu-1gb"
  type = string
  description = "Default size of a droplet"
}

variable "name" {
  type = string
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
