terraform {
  backend "azurerm" {
    resource_group_name = "Portfolio"
    storage_account_name = "__storageAccountName__"
    container_name = "__containerName__"
    key = "prod.terraform.tfstate"
  }
}
