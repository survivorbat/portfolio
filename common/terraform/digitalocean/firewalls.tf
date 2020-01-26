resource "digitalocean_firewall" "default_firewall" {
  name = "default"

  inbound_rule {
    protocol = "tcp"
    source_addresses = ["0.0.0.0/0", "::/0"]
    port_range = "80"
  }
  inbound_rule {
    protocol = "tcp"
    source_addresses = ["0.0.0.0/0", "::/0"]
    port_range = "443"
  }
  inbound_rule {
    protocol = "tcp"
    source_addresses = ["0.0.0.0/0", "::/0"]
    port_range = "22"
  }

  droplet_ids = [digitalocean_droplet.portfolio_droplet.id]
}
