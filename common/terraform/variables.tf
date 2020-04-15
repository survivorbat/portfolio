variable "do_token" {
  type        = string
  description = "Token to connect to DigitalOcean"
  default     = "__doToken__"
}

variable "personal_public_key" {
  type        = string
  description = "Path to personal public key"
  default     = "__personalPublicKey__"
}

variable "portfolio_public_key" {
  type        = string
  description = "Path to portfolio public key"
  default     = "__portfolioPublicKey__"
}
