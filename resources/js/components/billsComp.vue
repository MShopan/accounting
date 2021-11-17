<template>
  <div class="container m-auto">
    <partition-form
      :formData="formData"
      :show="showForm"
      @closeForm="showForm = false"
      @modelChanged="getModels()"
    >
    </partition-form>

    <div
      id="card"
      class="card shadow-sm m-8 p-8 glass flex content-center justify-center"
    >
      <form id="search-form" @submit.prevent="getModels" class="m-4">
        <input
          type="text"
          class="input input-sm input-success"
          v-model="search"
        />
        <button class="btn btn-sm btn-success mx-4" @click.once="getModels()">
          {{ $t("acc.search") }}
        </button>

      </form>

      <div id="main-table">
        <table class="table table-sm w-full">
          <thead>
            <tr>
              <th>{{$t('acc.bill_id')}}</th>
              <th>{{$t('acc.cusomer_id')}}</th>
              <th>{{$t('acc.prepaid')}}</th>
              <th>{{$t('acc.total')}}</th>
              <th>{{$t('acc.discount')}}</th>
              <th>{{$t('acc.pure_total')}}</th>
              <th>{{$t('acc.creator')}}</th>
              <th>{{$t('acc.created_at')}}</th>

              <th>{{$t('acc.tools')}}</th>
            </tr>
          </thead>
          <tbody v-if="models && models.data && models.data.length > 0">
            <tr
              class="hover:text-accent"
              v-for="model in models.data"
              :key="model.id"
            >
              <td>{{ model.bill_id }}</td>
              <td>{{ model.customer_id }}</td>
              <td>{{ model.prepaid }}</td>
              <td>{{ model.big_total }}</td>
              <td>{{ model.discount }}</td>
              <td>{{ model.pure_total }}</td>
              <td>{{ model.creator }}</td>
              <td>{{ model.created_at }}</td>
              <td>
                <!-- <delete-btn @click="deleteModel(modelName,model.id,getModels)"></delete-btn> -->
                 <button class="btn btn-warning btn-sm" @click="preview(model.bill_id)">Preview</button>
                 <button class="btn btn-info btn-sm" @click="print(model.bill_id)">Print</button>
              </td>
            </tr>

            <!-- total  -->
            <tr class="bg-green-500">
              <td></td>
              <td></td>
              <td></td>
              <td>{{ all_big_total }}</td>
              <td></td>
              <td>{{ all_pure_total }}</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <div v-if="models.data">
          <div
            v-if="models.data.length == 0"
            class="
              flex
              w-full
              content-center
              justify-center
              items-center
              bg-blue-300
            "
          >
            <div>no data</div>
          </div>
        </div>
      </div>

      <div class="flex content-center justify-center m-4">
        <pagination-api
          :links="models.links"
          @pagination-change-page="getModels"
        ></pagination-api>
      </div>
    </div>
  </div>
</template>

<script>
import paginationApi from "./PaginationApi.vue";
import golbalMix, { billReceipt, globalMix } from "../globalMix";
import AddBtn from "./btns/addBtn.vue";
import EditBtn from "./btns/editBtn.vue";
import AssignBtn from "./btns/assignBtn.vue";
import DeleteBtn from "./btns/deleteBtn.vue";
import PartitionForm from "./forms/partitionForm.vue";

export default {
  components: {
    paginationApi,
    AddBtn,
    EditBtn,
    AssignBtn,
    DeleteBtn,
    PartitionForm,
  },
  mixins: [globalMix],
  data: () => {
    return {
      models: Object,
      modelName: "bill_header",
      search: "",
      showForm: false,
      formData: Object,
      all_big_total: 0,
      all_pure_total: 0,
    };
  },
  mounted() {
    this.resetForm();
    this.getModels();
  },
  watch: {
    search: function (_old, _new) {
      const live = false;
      if (live) {
        this.getModels();
      }
    },
  },
  methods: {
      async preview(id){
          let bill = new billReceipt ;
          bill.bill_id = id ;
          await bill.get_bill_from_db();
        //   console.log(bill.bill_source);
          bill.preview();

      },
     async print(id){
          let bill = new billReceipt ;
          bill.bill_id = id ;
          await bill.get_bill_from_db();
        //   console.log(bill.bill_source);
          bill.print();

      },
    getModels(page = 1) {
      this.startLoad();
      axios
        .get(`api/bill_header?search=${this.search}&page=${page}`)
        .then((res) => {
          // console.log(res.data);
          if (res.data.msg && res.data.msg == "no data") {
            this.$swal(this.$t('acc.no_bill_founded'));
          } else {
            this.models = res.data.bills;
            this.endLoad();
            this.set_totals();
          }
        });
    },
    set_totals() {
      let bills = this.models.data;

      this.all_big_total = 0;
      this.all_pure_total = 0;

      bills.forEach((bill) => {
        this.all_big_total += bill.big_total;
        this.all_pure_total += bill.pure_total;
      });
    },
    fireAssign(element) {
      this.$emit("assignPartition", element);
    },
    resetForm() {
      this.formData = {
        id: -1,
        name: "",
        treat: "",
        coad: "",
      };
    },
    addNew() {
      this.resetForm();
      this.showForm = true;
    },
    editModel(model) {
      this.formData = model;
      this.showForm = true;
    },
  },
};
</script>
