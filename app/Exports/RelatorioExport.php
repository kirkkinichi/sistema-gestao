<?php

namespace App\Exports;

use App\Models\GrupoEconomico;
use Maatwebsite\Excel\Concerns\FromCollection;use Maatwebsite\Excel\Concerns\WithHeadings;

class RelatorioExport implements FromCollection, WithHeadings
{
    protected $data;
    protected $tags;

    public function __construct($data, $tags)
    {
        $this->data = $data;
        $this->tags = $tags;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $exportData = collect();

        foreach ($this->data as $grupoEconomico) {
            foreach ($grupoEconomico['bandeiras'] as $bandeira) {
                foreach ($bandeira['unidades'] as $unidade) {
                    foreach ($unidade['colaboradores'] as $colaborador) {
                        $row = [
                            'nome' => $colaborador['nome'],
                        ];

                        if (in_array('grupo_economico', $this->tags)) {
                            $row['grupo_economico'] = $grupoEconomico['grupo_economico'];
                        }
                        if (in_array('bandeira', $this->tags)) {
                            $row['bandeira'] = $bandeira['nome'];
                        }
                        if (in_array('unidade', $this->tags)) {
                            $row['unidade'] = $unidade['nome_fantasia'];
                        }
                        if (in_array('razao_social', $this->tags)) {
                            $row['razao_social'] = $unidade['razao_social'];
                        }
                        if (in_array('cnpj', $this->tags)) {
                            $row['cnpj'] = $unidade['cnpj'];
                        }
                        if (in_array('email', $this->tags)) {
                            $row['email'] = $colaborador['email'];
                        }
                        if (in_array('cpf', $this->tags)) {
                            $row['cpf'] = $colaborador['cpf'];
                        }

                        $exportData->push($row);
                    }
                }
            }
        }

        return $exportData;
    }

    public function headings(): array
    {
        $headings = ['Colaborador'];

        if (in_array('grupo_economico', $this->tags)) {
            $headings[] = 'Grupo Econômico';
        }
        if (in_array('bandeira', $this->tags)) {
            $headings[] = 'Bandeira';
        }
        if (in_array('unidade', $this->tags)) {
            $headings[] = 'Unidade';
        }
        if (in_array('razao_social', $this->tags)) {
            $headings[] = 'Razão Social';
        }
        if (in_array('cnpj', $this->tags)) {
            $headings[] = 'CNPJ';
        }
        if (in_array('email', $this->tags)) {
            $headings[] = 'Email';
        }
        if (in_array('cpf', $this->tags)) {
            $headings[] = 'CPF';
        }

        return $headings;
    }
}
