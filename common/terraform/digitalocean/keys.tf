resource "digitalocean_ssh_key" "personal_key" {
  name = "personal key"
  public_key = var.personal_public_key
}

resource "digitalocean_ssh_key" "portfolio_key" {
  name = "portfolio key"
  public_key = var.portfolio_public_key
}
