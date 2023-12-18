<script setup>
import { useTableRowClasses } from '@/Components/Core/Table/useTableRowClasses'

const { tableRowClasses } = useTableRowClasses()
</script>
<template>
    <tr :class="tableRowClasses">
        <slot></slot>
    </tr>
</template>
