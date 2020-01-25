resource "digitalocean_ssh_key" "personal_key" {
  name = "personal key"
  public_key = var.public_key
}
