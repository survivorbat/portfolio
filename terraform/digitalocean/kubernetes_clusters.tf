resource "digitalocean_kubernetes_cluster" "main" {
  name    = "projects"
  region  = var.region
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
    resources = ["*"]
    verbs = ["*"]
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

resource "kubernetes_service" "ingress-nginx" {
  metadata {
    name = "ingress-nginx"
    namespace = "ingress-nginx"
    labels = {
      "app.kubernetes.io/name" = "ingress-nginx",
      "app.kubernetes.io/part-of" = "ingress-nginx"
    }
  }
  spec {
    external_traffic_policy = "Local"
    type = "LoadBalancer"
    selector = {
      "app.kubernetes.io/name" = "ingress-nginx",
      "app.kubernetes.io/part-of" = "ingress-nginx"
    }
    port {
      port = 80
      name = "http"
      target_port = "http"
    }
    port {
      port = 443
      name = "https"
      target_port = "https"
    }
  }
}
