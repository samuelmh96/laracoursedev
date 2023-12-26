<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 ">

            <!-- Botón "Crear Roles" -->
            <button v-if="$page.props.user.permissions.includes('create roles')" class="button create-roles">
                Crear Roles
            </button>

            <!-- Botón "Manage Lessons" -->
            <button v-if="$page.props.user.permissions.includes('create lessons')" class="button manage-lessons">
                Create new Lessons
            </button>
        </div>
    </div>
</template>
<style>
/* Estilo base para ambos botones */
.button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin: 10px;
}

/* Estilo para el botón "Crear Roles" */
.create-roles {
    background-color: #4CAF50;
    color: #fff;
    border: 2px solid #4CAF50;
}

/* Estilo para el botón "Manage Lessons" */
.manage-lessons {
    background-color: #3498db;
    color: #fff;
    border: 2px solid #3498db;
}

/* Animación de cambio de color al pasar el ratón sobre el botón */
.button:hover {
    background-color: #fff;
    color: #000;
}
</style>
