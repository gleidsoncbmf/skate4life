<?php

use App\Models\Inscricao;

function displayPagamento($pagamento) {
    if ($pagamento == 0) {
        return '<svg xmlns="public\assets\bootstrap\icones\circle-fill.svg" width="16" height="16" fill="red" class="bi bi-circle-fill" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
                </svg>';
    } else {
        return '<svg xmlns="public\assets\bootstrap\icones\circle-fill.svg" width="16" height="16" fill="green" class="bi bi-circle-fill" viewBox="0 0 16 16">
        <circle cx="8" cy="8" r="8"/>
        </svg>';
    }
}
