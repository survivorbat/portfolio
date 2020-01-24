resource "digitalocean_kubernetes_cluster" "main" {
  name    = "projects"
  region  = "nyc1"
  version = "1.16.2-do.3"
  tags = ["production"]
  node_pool {
    name       = "main-pool"
    node_count = 1
    size       = "s-2vcpu-2gb"
  }
}

provider "kubernetes" {
  host  = digitalocean_kubernetes_cluster.main.endpoint
  token = digitalocean_kubernetes_cluster.main.kube_config[0].token
  cluster_ca_certificate = base64decode(
  digitalocean_kubernetes_cluster.main.kube_config[0].cluster_ca_certificate
  )
}

resource "kubernetes_namespace" "portfolio_namespace" {
  provider = kubernetes
  metadata {
    name = "portfolio"
  }
}
