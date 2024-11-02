<?php
require_once __DIR__ . '/vendor/autoload.php';

$produtos = [
    [
        'nome' => 'Fone de Ouvido Bluetooth',
        'categoria' => 'Eletrônicos',
        'preco' => 149.90,
        'descricao' => 'Fone de ouvido Bluetooth com som de alta qualidade e bateria duradoura.'
    ],
    [
        'nome' => 'Smartphone',
        'categoria' => 'Eletrônicos',
        'preco' => 1999.90,
        'descricao' => 'Smartphone com tela de 6.5" e câmera de 64MP.'
    ],
    [
        'nome' => 'Smartwatch',
        'categoria' => 'Eletrônicos',
        'preco' => 699.90,
        'descricao' => 'Smartwatch com monitoramento de saúde e notificações inteligentes.'
    ],
    [
        'nome' => 'Speaker Bluetooth',
        'categoria' => 'Eletrônicos',
        'preco' => 299.90,
        'descricao' => 'Caixa de som Bluetooth portátil com qualidade de som premium.'
    ]
];

$mpdf = new \Mpdf\Mpdf();

$html = '<h1 style="text-align: center;">Relatório de Produtos Eletrônicos</h1>';
$html .= '<p>Data de geração: ' . date('d/m/Y H:i:s') . '</p>';
$html .= '<table style="width: 100%; border-collapse: collapse;">';
$html .= '<thead>';
$html .= '<tr style="background-color: #007bff; color: white;">';
$html .= '<th style="border: 1px solid #dddddd; padding: 8px;">Nome</th>';
$html .= '<th style="border: 1px solid #dddddd; padding: 8px;">Categoria</th>';
$html .= '<th style="border: 1px solid #dddddd; padding: 8px;">Preço (R$)</th>';
$html .= '<th style="border: 1px solid #dddddd; padding: 8px;">Descrição</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

foreach ($produtos as $produto) {
    $html .= '<tr>';
    $html .= '<td style="border: 1px solid #dddddd; padding: 8px;">' . $produto['nome'] . '</td>';
    $html .= '<td style="border: 1px solid #dddddd; padding: 8px;">' . $produto['categoria'] . '</td>';
    $html .= '<td style="border: 1px solid #dddddd; padding: 8px;">' . number_format($produto['preco'], 2, ',', '.') . '</td>';
    $html .= '<td style="border: 1px solid #dddddd; padding: 8px;">' . $produto['descricao'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

$mpdf->WriteHTML($html);

$mpdf->Output('relatorio_produtos_electronicos.pdf', 'D');
