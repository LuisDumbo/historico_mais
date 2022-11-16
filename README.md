 ###Dados Pessoas###

        Nome Completo
        Data
        sexo
        tipo sanguineo
        BI

###Dados Triagem ##
        peso
        altura
        temperatura

####Dados exames ## 
        tipo 
        resultado
        img


###Dados Consultas ####


exemplo 
{
    "BI" : "39ja938",
    "dados" :{
        "exame": "Uma nova consulta",
        "mecio": "Luis dEMBO"
    }
}
        medico_codigo
        anamnese 
        exames
        prescricao_medica
        diagnostico
        data

#####editar uma onsulta ##
{
    "id_consulta": "39ja938637212e25b3e9",
    "dados":{
        "mecio": "Pualo Diogo id editado muitas vezes"
    },
    "exame" :{
            "id_exame": "32637212e25b42d",
            "dados":{
                "exame": "um exam com id da consulta que foi editado muitas outras   ves outra vez "
            }
        }
}

###internamentos###
        local
        tempo