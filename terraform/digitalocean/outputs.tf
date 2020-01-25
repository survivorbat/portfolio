output "cluster-id" {
  value = digitalocean_kubernetes_cluster.main.id
}

resource "local_file" "kubeconfigdo" {
  count    = 1
  content  = digitalocean_kubernetes_cluster.main.kube_config[0].raw_config
  filename = "${path.module}/kubeconfig"
}
