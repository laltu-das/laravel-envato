<script setup>

import { useTableCellClasses } from '@/Components/Core/Table/useTableCellClasses'

const { tableCellClasses } = useTableCellClasses()
</script>
<template>
    <td :class="tableCellClasses">
        <slot></slot>
    </td>
</template>
