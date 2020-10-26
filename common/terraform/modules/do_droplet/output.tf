output "ipv4" {
  value = digitalocean_droplet.droplet.ipv4_address
}

output "ipv6" {
  value = digitalocean_droplet.droplet.ipv6_address
}

output "droplet_urn" {
  value = digitalocean_droplet.droplet.urn
}
