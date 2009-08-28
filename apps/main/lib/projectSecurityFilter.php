<?php

class projectSecurityFilter extends sfFilter {
  public function execute($filterChain) {
    $filterChain->execute();
  }
}
