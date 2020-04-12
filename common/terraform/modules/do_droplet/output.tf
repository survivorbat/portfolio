output "ipv4" {
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
}

output "ipv4_private" {
  value = digitalocean_droplet.portfolio_droplet.ipv4_address_private
}

output "ipv6" {
  value = digitalocean_droplet.portfolio_droplet.ipv6_address
}

output "ipv6_private" {
  value = digitalocean_droplet.portfolio_droplet.ipv6_address_private
}

output "droplet_urn" {
  value = digitalocean_droplet.portfolio_droplet.urn
}
