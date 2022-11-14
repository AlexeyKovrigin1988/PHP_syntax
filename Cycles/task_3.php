<?php

//Вы вложили 100 000 рублей на депозит в банк под 8% годовых. Вычислите, через сколько лет сумма на вашем депозите удвоится, при условии, что каждые три года банк будет увеличивать процентную ставку на 2%.

$deposit = 100000;
$checking_account = [];
$year_and_interest = [];
$interest_rate = 1.08;

for ($i = 0; $deposit < 200000; $i++) {

    if ($i > 0 && $i % 3 == 0){
        $interest_rate = $interest_rate + 0.02;
    }
    $deposit = $deposit * $interest_rate;

    // записываем данные во внешние переменные
    if ($deposit > 200000) {
        $checking_account[] = number_format($deposit, 2,'.','');
        $year_and_interest[] = $i + 1;
        $year_and_interest[] = $interest_rate;
    };
}

echo "На {$year_and_interest[0]} год вложений депозит составит {$checking_account[0]}, а процентная ставка составит {$year_and_interest[1]}";
