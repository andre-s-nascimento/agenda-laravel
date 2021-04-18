#Criar o Model, Controller, Seeder e Factory
sail artisan make:model <MODEL> -mfsc

#Popular a Base de Dados
sail artisan db:seed --class=ContatoSeeder

#Criar o FormRequest Validator
sail artisan make:request StoreUpdate<MODEL>Request

Depois ir ao arquivo criado e alterar
public function authorize()
{
return true; //lembrar de atualizar aqui o Validador Customizado o default é false
}

#link simbolico public para armazenamento
sail artisan storage:link
