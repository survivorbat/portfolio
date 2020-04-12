variable "description" {
  type = string
  default = ""
}

variable "name" {
  type = string
}

variable "purpose" {
  type = string
  default = "Other"
}

variable "environment" {
  type = string
  default = "development"
}

variable "resources" {
  type = list(string)
  default = []
}
