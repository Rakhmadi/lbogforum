<template>
    <div>
        <table id="myTable" class="table">
	<thead>
		<tr>
			<th>Head 1</th>
			<th>Head 2</th>
			<th>Head 3</th> 
			 <!-- If column contain type date add attribut "type-date" example = <th type-date >Head 3</th>  -->
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>data 1</td>
			<td>data 2</td>
			<td>data 3</td>
		</tr>
	</tbody>
</table>
    </div>
</template>
<script>
import RdataTB from 'rdatatb'

export default {
    mounted() {
        let x = new RdataTB('myTable');

    },
}
</script>