variable "portfolio_service_account_name" {}
variable "portfolio_role_name" {}
variable "portfolio_namespace_name" {}

resource "digitalocean_kubernetes_cluster" "main" {
  name    = "projects"
  region  = "nyc1"
  version = "1.16.2-do.3"
  tags = ["production"]
  node_pool {
    name       = "main-pool"
    node_count = 1
    size       = "s-1vcpu-2gb"
  }
}

resource "kubernetes_namespace" "portfolio_namespace" {
  provider = kubernetes
  metadata {
    name = var.portfolio_namespace_name
  }
}

resource "kubernetes_service_account" "portfolio_service_account" {
  provider = kubernetes
  metadata {
    name = var.portfolio_service_account_name
    namespace = var.portfolio_namespace_name
  }
}

resource "kubernetes_role" "portfolio_role" {
  provider = kubernetes
  metadata {
    name = var.portfolio_role_name
    namespace = var.portfolio_namespace_name
  }
  rule {
    api_groups = ["apps"]
    resources = ["pods", "services", "deployments", "pvc", "ingress", "pv"]
    verbs = ["get", "patch", "list", "create", "update", "describe"]
  }
}

resource "kubernetes_role_binding" "portfolio_role_binding" {
  provider = kubernetes
  metadata {
    name = "portfolio_role_binding"
    namespace = var.portfolio_namespace_name
  }
  role_ref {
    api_group = "rbac.authorization.k8s.io"
    kind = "Role"
    name = var.portfolio_role_name
  }
  subject {
    kind = "ServiceAccount"
    name = var.portfolio_service_account_name
    namespace = var.portfolio_namespace_name
  }
}
