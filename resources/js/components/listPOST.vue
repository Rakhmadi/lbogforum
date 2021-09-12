<template>
    <div class="table-responsive">
<table id="myTable" class="table table-bordered inintColorthemesMode">
	<thead>
		<tr>
			<th>Title</th>
			<th  type-date>Created</th>
			<th>Action</th>

			 <!-- If column contain type date add attribut "type-date" example = <th type-date >Head 3</th>  -->
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in resp" :key="item.id">
			<td>{{item.title}}</td>
			<td>{{date(item.created_at)}}</td>
			<td>
				<div  class="d-flex flex-row justify-content-center">
					<router-link data-aos="zoom-in" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill" to="createTag">
						<i class="mdi mdi-pencil"></i>
					</router-link>
					<router-link data-aos="zoom-in" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill" style="background-color:#e89f5633 !important ;color: #5e56e8 !important;"  to="createTag">
						<i class="mdi mdi-eye"></i>
					</router-link>
					<router-link data-aos="zoom-in" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill" style="background-color:#e89f5633 !important ;color: #5e56e8 !important;" to="createTag">
						<i class="mdi mdi-tag-plus"></i>
					</router-link>
					<router-link data-aos="zoom-in" class="btn btn-sm me-2 shadow-none boreder-0 btn-comment-circle w-auto rounded-pill" style="background-color:#e8565633 !important ;color: #e85656 !important;" to="createTag">
						<i class="mdi mdi-delete"></i>
					</router-link>
				</div>

			</td>
		</tr>
	</tbody>
</table>
    </div>
</template>
<script>
import RdataTB from 'rdatatb'
import axios from 'axios'
import cekMode from "../mode"

export default {
    async mounted() {
		await axios.get(`/api/listUserPost?token=${sessionStorage['token']}`).then(x=>{
			this.resp = x.data
			console.log(this.resp)
			
		})
		let x = await new RdataTB('myTable',{
						ShowSearch:true, // show search field,
						ShowSelect:true, // show show select,
						ShowPaginate:false, // show paginate ,
						SelectionNumber:[5,10,20,50], //Change Option in Select
						ShowHighlight:false, // show Highlight if search
	       				fixedTable:true, // fixed table
                		sortAnimate:true // show animated if sorted
		});
		cekMode()

    },
	data() {
		return {
			resp:[]
		}
	},
	methods:{
		date(x){
          return new Date(x).toLocaleString('en-US');
      	},
	},
}
</script>