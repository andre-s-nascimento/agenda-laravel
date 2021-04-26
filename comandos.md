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

#FRONT END
#Instalando tailwindcss jit

npm install

npm install -D tailwindcss A

npx tailwindcss init

#Next, you should add each of Tailwind's "layers" to your application's resources/css/app.css file:

@tailwind base;
@tailwind components;
@tailwind utilities;

npm install -D @tailwindcss/jit tailwindcss postcss

#Criando arquivo tailwind.config.js
// tailwind.config.js
module.exports = {
purge: [
'./resources/**/*.blade.php',
'./resources/**/*.js',
'./resources/**/*.vue',
],
darkMode: false, // or 'media' or 'class'
theme: {
extend: {},
},
variants: {
extend: {},
},
plugins: [],
}npm

#executar
npx mix watch
