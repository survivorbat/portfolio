output "portfolio_droplet_ipv4" {
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
}

output "portfolio_droplet_ipv6" {
  value = digitalocean_droplet.portfolio_droplet.ipv6_address
}
