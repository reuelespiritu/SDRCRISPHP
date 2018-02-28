<?php

require_once ('model/m_project_budget.php');
require_once ('model/m_project_expenses.php');

function generatetotalbudget() {
    $budgetsum = getbudgetsum();
    foreach ($budgetsum as $arr_result) {
   $budget=$arr_result['amount'];
        }

    return $budget;
}

function generatetotalexpense() {
    $budgetsum = getexpensesum();
    foreach ($budgetsum as $arr_result) {
   $budget=$arr_result['amount'];
        }

    return $budget;
}

function generateremainingbudget(){
    $budget=generatetotalbudget();
    $expense= generatetotalexpense();
    $remaining=$budget-$expense;
    return $remaining;
}
?>

