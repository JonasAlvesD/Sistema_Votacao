<?php 

class Votador
{

    private $id;
    private $nome;
    private $cpf;
    private $idade;
    private $RN;
    public $msg;
    public $erro = [];

    public function __construct($nome, $cpf, $idade, $RN)
    {
        
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idade = $idade;
        $this->RN = $RN;

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    //==============================
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    //==============================
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    //==============================
    public function getIdade()
    {
        return $this->idade;
    }
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    //==============================
    public function getRn()
    {
        return $this->RN;
    }
    public function setRn($RN)
    {
        $this->RN = $RN;
    }
    //==============================
    public function getMsg()
    {
        return $this->msg;
    }
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
    
    public function validarDados()
    {
        if (empty($this->nome) || is_numeric($this->nome)) {
            $this->erro["erro_nome"] = "Nome invalido!";
        }

        // eu botei assim porque o cpf so tem 11 digitos entao se ele for menor que 10000000000 vai ter so 9 e se for maior que 99999999999 vai ter 12 numeros.
        if ($this->cpf < 10000000000 || $this->cpf > 99999999999 || !is_numeric($this->cpf)) {
            $this->erro["erro_cpf"] = "O Cpf deve conter 11 numeros!";
        }
        
        if ($this->idade < 16 || !is_numeric($this->idade)) {
            $this->erro["erro_idade"] = "Voce é muito novo para votar!";
        }

        if ($this->idade > 120 || !is_numeric($this->idade)) {
            $this->erro["erro_idade"] = "Idade invalida!";
        }

        $this->idade = str_replace(",", ".", $this->idade);
        if (!is_numeric($this->idade)) {
            $this->erro["erro_idade"] = "A idade deve ser um numero!";
        }

        $this->cpf= str_replace(",", ".", $this->cpf);
        if (!is_numeric($this->cpf)) {
            $this->erro["erro_cpf"] = "O cpf deve ser um numero!";
        }
        
        if (empty($this->RN)) {
            $this->erro["erro_RN"] = "Nenhum dos candidatos foi escolhido!";
        }


        if (empty($this->erro)) {

            if ($this->RN == 1) {
                $this->msg = "Parabéns usuário de windows! Você votou no Bill Gates!";
            } elseif ($this->RN == 2) {
                $this->msg = "Parabéns entusiasta de metaverso! você votou no Mark Zuckerberg!";
            }
        }
    }

}

?>