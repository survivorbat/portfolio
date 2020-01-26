output "portfolio_droplet_ipv4" {
  value = digitalocean_droplet.portfolio_droplet.ipv4_address
}

output "portfolio_droplet_price" {
  value = "$ ${digitalocean_droplet.portfolio_droplet.price_monthly} monthly"
}
