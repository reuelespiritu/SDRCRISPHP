
<?php

require_once 'model/m_project_expenses.php';
require_once 'model/m_method_of_expense.php';
require_once 'model/m_expense_category.php';

function submit_expense($amount, $remarks, $project, $expensecategory, $expensemethod) {

    $controller_result = setprojectexpenses($amount, $remarks, $project, $expensecategory, $expensemethod);
  
    return TRUE; }

function generate_all_expenses() {

    $result = array();
    $result = getallexpenses();
    return $result;
}

function generate_all_expensecategory() {

    $result = array();
    $result = getallexpensecategory();
    return $result;
}

function generate_all_expensemethod() {

    $result = array();
    $result = getallmethodofexpense();
    return $result;
}

function delete_categoryexpense($deactivate) {

    $controller_result = deactivateexpensecategory($deactivate);
}

function getupdate_expensecategory($update) {
    $result = array();
    $result = getexpensecategory($update);
    return $result;
}

function submitupdate_expensecategory($name, $description, $id) {
    $controller_result = updateexpensecategory($name, $description, $id);
}


function generatetotalexpense() {
    $budgetsum = getexpensesum();
    foreach ($budgetsum as $arr_result) {
   $budget=$arr_result['amount'];
        }

    return $budget;
}