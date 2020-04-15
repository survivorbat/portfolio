terraform {
  required_version = "0.12.24"
  backend "azurerm" {
    resource_group_name = "Portfolio"
    storage_account_name = "portfoliostate"
    container_name = "tfstate"
    key = "prod.terraform.tfstate"
  }
}
