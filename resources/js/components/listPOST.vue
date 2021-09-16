<template>
    <div class="p-0 m-0">
        <div class="">
            <div class="">
<table id="myTable" class=" table inintColorthemesMode table-bordered w-100">
	<thead>
		<tr>
			<th>Title</th>
			<th type-date>Created</th>
			<th>o1</th> 

			 <!-- If column contain type date add attribut "type-date" example = <th type-date >Head 3</th>  -->
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in reps" :key="item">
			<td>{{item.title}}</td>
			<td >{{date(item.created_at)}}</td>
			<td>
                <a class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
<i class="fs-6 mdi mdi-pencil"></i>
</a>
               <a class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
<i class="fs-6 mdi mdi-tag-plus"></i>
</a>
               <a class="toggles_order_hint btn btn-sm m-1 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill toggles_order">
<i class="fs-6 mdi mdi-delete"></i>
</a>

            </td>
		</tr>
	</tbody>
</table>
            </div>
        </div>
    </div>
</template>
<script>
import RdataTB from 'rdatatb'
import axios from 'axios'
import cekMode from '../mode.js'
export default {
    mounted(){
        cekMode()

        this.getData()
    },
    data() {
        return {
            reps:[]
        }
    },
    methods:{
        getData(){
            axios.get(`${window.location.origin}/api/userPost?token=${sessionStorage['token']}`).then(x=>{
                console.log(x.data)
                this.reps = x.data
            }).then(()=>{
                new RdataTB('myTable',{
	            });
            })
        },
          date(x){
          return new Date(x).toLocaleString('en-US');
      },
    }
}
</script>